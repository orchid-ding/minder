## 适配本地需要修改以下URL
> __GET_URL__ : 获取数据的API

> __POST_URL__: 存储数据的API

> 获取数据 <br />
```js
$.get('__GET_URL__', {}, function (res) {
    if (res.status == 1) {
        editor.minder.importData('json', res.data)
    }
}, 'json')
```

> 保存数据
```js
$.post('__POST_URL__', editor.minder.exportJson(), function (res) {
    if (res.status != 1) {
        $.Toast('提示', '保存错误', 'error');
    } else {
        $.Toast('提示', '保存成功', 'success');
    }
})
```

### 下载即可拥有本地化百度脑图
* 附上 [API](https://github.com/MasterJoyHunan/minder/blob/master/Minder.php)
