layui.use(['context', 'table', 'select','toast'], function () {
  var context = layui.context;
  var select = layui.select;
  var toast = layui.toast;

  try {
    window.layadmin = JSON.parse(context.get('layadmin'));

    select.config(layadmin.select)

    var pageConfig = layadmin.page;// 页面配置

    if (pageConfig !== undefined && pageConfig.layout === 'table') {
      var table = layui.table;
      var tableConfig = layadmin.table;

      table.set({
        parseData: function (res) {
          return {
            code: _.get(res, tableConfig.parseData.code, res.code),
            msg: _.get(res, tableConfig.parseData.msg, res.msg),
            count: _.get(res, tableConfig.parseData.count, res.count),
            data: _.get(res, tableConfig.parseData.data, res.data)
          }
        },
        response: {
          statusName: tableConfig.response.statusName,
          statusCode: tableConfig.response.statusCode,
        },
        defaultToolbar: tableConfig.defaultToolbar,
        page: tableConfig.page,
        skin: tableConfig.skin,
        even: tableConfig.even,
      })

      var pageTableConfig = _.get(pageConfig, 'components.table.config', false)
      if (!pageTableConfig) {
        console.log(pageConfig)
        throw new Error('表格配置参数错误！')
      }

      table.render(pageTableConfig);
    }
  } catch (exception) {
    toast.error({
      title: '页面错误',
      message: exception.message,
      position: 'topRight'
    })
  }
})
