<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=180&section=header&text=传康API&fontSize=42&fontColor=fff&animation=twinkling&fontAlignY=32&desc=免费、稳定、高效的%20API%20接口服务平台&descAlignY=52&descSize=18" width="100%"/>

<br/>

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-28a745?style=flat-square)](LICENSE)
[![Railway](https://img.shields.io/badge/Railway-deployed-blueviolet?style=flat-square&logo=railway)](https://ckapi-production.up.railway.app)
[![GitHub stars](https://img.shields.io/github/stars/1837620622/ckapi?style=flat-square&logo=github)](https://github.com/1837620622/ckapi)

<br/>

**🎯 200+ 免费接口 | ⚡ 毫秒级响应 | 🔒 稳定可靠 | 📊 实时统计**

<br/>

[🌐 在线体验](https://ckapi-production.up.railway.app) &nbsp;•&nbsp; [📖 接口文档](#-api-接口列表) &nbsp;•&nbsp; [🚀 快速部署](#-快速部署) &nbsp;•&nbsp; [💬 联系作者](#-联系方式)

</div>

---

## 📋 目录

- [项目简介](#-项目简介)
- [功能特性](#-功能特性)
- [API 接口列表](#-api-接口列表)
- [快速部署](#-快速部署)
- [配置说明](#-配置说明)
- [使用示例](#-使用示例)
- [项目结构](#-项目结构)
- [联系方式](#-联系方式)

---

## 💡 项目简介

**传康API** 是一个免费的综合性 API 接口服务平台，收录了 **200+** 实用接口，涵盖音乐解析、图片获取、工具查询、娱乐趣味等多个领域。

> 🎯 **宗旨**：为开发者提供简单、免费、稳定的 API 服务

---

## ✨ 功能特性

| 核心优势 | 技术保障 |
|:---|:---|
| ✅ **完全免费** - 所有接口免费，无隐藏收费 | 🔐 **API 密钥** - 支持密钥验证，防止滥用 |
| ✅ **响应极速** - 毫秒级响应，99.9% 可用性 | 📊 **调用统计** - 内置统计，实时监控 |
| ✅ **简单易用** - RESTful 设计，一行代码调用 | � **多端支持** - 兼容机器人、APP、网站 |
| ✅ **持续更新** - 定期维护，不断新增接口 | 📖 **开源透明** - MIT 协议，代码开源 |

---

## 🎨 API 接口列表

| 分类 | 数量 | 热门接口 |
|:---|:---:|:---|
| 🎵 **音乐解析** | 30+ | QQ音乐、网易云、酷狗、酷我 |
| 🖼️ **图片接口** | 40+ | 随机美图、二次元、动漫、壁纸 |
| 🔧 **实用工具** | 50+ | IP查询、短链、二维码、翻译 |
| 📱 **社交查询** | 20+ | QQ资料、头像、微博热搜 |
| 🎮 **娱乐趣味** | 30+ | 土味情话、毒鸡汤、笑话段子 |
| ☁️ **天气服务** | 10+ | 实时天气、未来预报、空气质量 |
| 📰 **热点资讯** | 20+ | 各平台热搜、新闻头条 |

---

## 🚀 快速部署

### 方式一：Railway 一键部署（推荐）

[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/new/template?template=https://github.com/1837620622/ckapi)

1. 点击上方按钮，跳转到 Railway
2. 使用 GitHub 账号登录
3. 点击 **Deploy Now** 开始部署
4. 等待完成，获取专属域名

### 方式二：本地部署

**Mac / Linux：**
```bash
git clone https://github.com/1837620622/ckapi.git
cd ckapi
php -S localhost:8080
# 访问 http://localhost:8080
```

**Windows：**
1. 下载 [PHPStudy](https://www.xp.cn/) 并安装
2. 将项目放入 `phpstudy_pro/WWW/` 目录
3. 启动 Apache，访问 `http://localhost/ckapi`

---

## ⚙️ 配置说明

编辑 `tianyi.php` 文件进行配置：

```php
<?php
$ming = '你的名称';              // 站点名称
$kefu = '你的QQ';               // 客服QQ
$youxiang = '你的邮箱';          // 联系邮箱
$apikey = '设置你的密钥';        // API管理密钥（重要：请修改默认密钥）
$yunhang = '2022-11-15';        // 运行起始日期
?>
```

---

## 📚 使用示例

| 接口 | 请求 | 响应示例 |
|:---|:---|:---|
| 随机颜色 | `GET /api/yanse.php` | `#3A7BD5` |
| 获取IP | `GET /api/ip.php` | `192.168.1.100` |
| 随机美图 | `GET /api/sjtp.php` | 图片直链 |
| 天气查询 | `GET /api/tianqi.php?city=北京` | JSON数据 |

**完整请求示例：**
```
https://ckapi-production.up.railway.app/api/yanse.php
```

---

## 📁 项目结构

```
ckapi/
├── api/                    # 接口目录（200+ 接口文件）
│   ├── API.php             # 核心处理文件
│   ├── yanse.php           # 随机颜色接口
│   ├── ip.php              # IP查询接口
│   └── ...                 # 更多接口
├── template/               # 前端模板目录
├── tianyi.php              # 全局配置文件
├── index.php               # 网站入口
├── jiekou.json             # 接口配置数据
└── README.md               # 项目说明
```

---

## 💬 联系方式

<div align="center">

| 💬 QQ | 📱 微信 | 📧 邮箱 |
|:---:|:---:|:---:|
| `1837620622` | `1837620622` | `2040168455@qq.com` |

**🎬 B站 / 🐟 咸鱼：`万能程序员`**

</div>

---

## 📄 开源协议

本项目基于 **MIT** 协议开源，欢迎 Fork 和 Star ⭐

---

<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=100&section=footer" width="100%"/>

**Made with ❤️ by [传康KK](https://github.com/1837620622)**

</div>
