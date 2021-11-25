layui.use(['context', 'table', 'select','toast','treetable'], function () {
  try {
    window.layadmin = JSON.parse(layui.context.get('layadmin'));

    layui.select.config(layadmin.select)

    var pageConfig = layadmin.page;// 页面配置

    if (pageConfig === undefined) {
      throw new Error('页面配置参数错误！')
    }

    if (pageConfig.layout === 'table' || pageConfig.layout === 'treetable') {
      var table = layui.table;
      var tableConfig = layadmin.table;
      var tableGlobalSet = {
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
      }

      var pageTableConfig = _.get(pageConfig, 'components.table.config', false);
      if (!pageTableConfig) {
        throw new Error('表格配置参数错误！')
      }

      table.set(tableGlobalSet);
      if (pageConfig.layout === 'table') {
        table.render(pageTableConfig);
      }else if (pageConfig.layout === 'treetable'){
        pageTableConfig.parseData = tableGlobalSet.parseData;

        layui.treetable.render(pageTableConfig);
      }
    }
  } catch (exception) {
    layui.toast.error({
      title: '页面错误',
      message: exception.message,
      position: 'topRight'
    })
  }
})
