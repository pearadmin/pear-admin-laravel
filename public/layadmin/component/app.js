layui.use(['context', 'table', 'select'], function () {
  var context = layui.context;
  var select = layui.select;

  try {
    window.layadmin = JSON.parse(context.get('layadmin'));

    select.config(layadmin.select)

    var pageConfig = layadmin.page;// 页面配置

    if (pageConfig.layout === 'table') {
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

      var pageTableConfig = _.get(pageConfig, 'components.table', false)
      if (!pageTableConfig) {
        throw new Error('页面配置文件中未准确设置表格参数！')
      }

      table.render(pageTableConfig);
    }
  } catch (exception) {
    console.log(exception.message)
  }
})
