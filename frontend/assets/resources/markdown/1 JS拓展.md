# JS拓展

### html2canvas

该脚本允许您直接在用户浏览器上对网页或其部分进行"截屏"。屏幕截图是基于DOM的，因此可能无法100%准确地表示真实的屏幕，因为它不会生成实际的屏幕截图，而是基于页面上可用的信息构建屏幕截图。

#### 下载

```shell
//下载
npm install --save html2canvas
// element是需要截图的元素
html2canvas(element,options);
```

#### options参数

| **参数名称** | **类型** | **默认值** | **描述** |
|------|----|-----|----|
| allowTaint | boolean | false | 允许跨域 |
| useCORS | boolean | false | 貌似与跨域有关，但和allowTaint不能共存 |
| proxy | string | undefined | 代理地址 |
| taintTest | boolean | true | 是否在渲染前测试图片 |
| timeout | number | 0 | 图片加载延迟，默认延迟为0，单位毫秒 |
| logging | boolean | false | 在Console中输出信息 |
| width | number | null | canvas的宽度设定 |
| height | number | null | canvas的高度设定 |
| background | string | \#fff | canvas的背景颜色（未指定则为透明） |
| letterRendering | boolean | false | 在设置了字间距的时候有用 |

#### 用法

```html
//引入
<script type="text/javascript" src="./dist/html2canvas.js"></script>
<script type="text/javascript">
    //写法1
    var callback = {
        allowTaint:true,
        taintTest: false,
        width: "100px",
        height: "100px",
        onrendered: function (canvas) {
            var dataUrl = canvas.toDataURL("image/png", 1.0);
            var newImg = document.createElement("img");
            newImg.src = dataUrl;
            $(".box").empty().append(newImg);
            newImg.style.width = "100%";
        }
    };
    html2canvas( $(".box"), callback);

    //写法2 下载到本地
    function screenshot(Element, filename) {
    //获取当前页面canas
    html2canvas(Element, {useCORS: true}).then(function (canvas) {
        //获取图片数据
        var imgData = canvas.toDataURL();
        //下载图片
        var saveFile = function (data, filename) {
            var save_link = document.createElementNS(
                'http://www.w3.org/1999/xhtml', 'a');
            save_link.href = data;
            save_link.download = filename;
            //创建事件
            var event = document.createEvent('MouseEvents');
            event.initMouseEvent('click', true, false, window,
                0, 0, 0, 0, 0, false, false, false, false, 0, null);
            save_link.dispatchEvent(event);
        };
        saveFile(imgData, filename);
    })
}

    //调用
    screenshot(document.body, "001.png");
</script>
```

### 十六进制解码

```javascript
//解码
function decode(str) {
    return str.replace(/\\x(\w{2})/g, function (_, $1) {
        return String.fromCharCode(parseInt($1, 16))
    });
}

//编码
function encode(str) {
    return str.replace(/(\w)/g, function (_, $1) {
        return "\\x" + $1.charCodeAt(0).toString(16)
    });
}
```

```sh
# 查看已安装全局安装的包
npm ls -g
# 清理缓存
npm cache clean --force
# 安装vue命令行工具
npm install -g @vue/cli
# 安装打包工具和打包命令行
npm install webpack webpack-cli -g
```