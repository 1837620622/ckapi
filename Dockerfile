# ============================================================
# 高性能 PHP 生产环境 Docker 配置
# 使用 PHP-FPM + Caddy 实现多进程并发处理
# ============================================================

FROM dunglas/frankenphp:latest-php8.2-alpine

# ------------------------------------------------------------
# 安装必要的 PHP 扩展
# ------------------------------------------------------------
RUN install-php-extensions \
    opcache \
    apcu \
    curl \
    mbstring

# ------------------------------------------------------------
# 配置 PHP OPcache 性能优化
# ------------------------------------------------------------
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.jit=1255" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.jit_buffer_size=100M" >> /usr/local/etc/php/conf.d/opcache.ini

# ------------------------------------------------------------
# 复制项目文件
# ------------------------------------------------------------
WORKDIR /app
COPY . /app

# ------------------------------------------------------------
# 创建 Caddyfile 配置
# ------------------------------------------------------------
RUN echo ':${PORT:80} {\n\
    root * /app\n\
    php_server\n\
    encode gzip\n\
    file_server\n\
    log {\n\
        output stdout\n\
    }\n\
    @health path /health\n\
    respond @health 200 {\n\
        body "{\"status\":\"ok\"}"\n\
    }\n\
}' > /etc/caddy/Caddyfile

# ------------------------------------------------------------
# 设置环境变量
# ------------------------------------------------------------
ENV FRANKENPHP_CONFIG="worker /app/index.php"
ENV SERVER_NAME=":${PORT:80}"
ENV CADDY_GLOBAL_OPTIONS="auto_https off"

# ------------------------------------------------------------
# 启动命令
# ------------------------------------------------------------
EXPOSE 80
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
