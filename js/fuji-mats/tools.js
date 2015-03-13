/**
 * tools - user tools for mat building process.
 *
 * @author michael brevig <michaelbrevig@gmail.com>
 * @type {{menu: {}, init: Function, bindActions: Function}}
 */
tools = {
    _data: {},
    menu: {},

    init: function () {
        tools.menu = $('#toolmenu');
    },

    bindActions: function () {
        $(tools.menu)
            .find('button.active-btn')
            .each(function () {
                $(this).bind('click', function () {

                    var method = $(this).attr('data-action');
                    fujiDebug.append('Tool button clicked. Method: ' + method);

                    var method2 = $(this).attr('data-condition');
                    fujiDebug.append('Tool button clicked. Chained 2nd method: ' + method2);
                    var action = tools[method][method2];
                    action(this);

                });
            });
    },

    settings: {

        div:
            function (obj) {
                if(tools._data.settingsSet) {
                    $('#toolSettings').show();
                    return;
                }

                var activeDiv = $(obj).parent().parent();
                var settingsDiv = $('#toolSettings');

                activeDiv.after(settingsDiv);

                $('#save-settings').bind('click', function(e){
                    tools.settings.save(this);

                    $(this).prop('disabled', true );
                    e.preventDefault();

                });
            },
        save:
            function (){
                //this will need a lot of work.
                tools._data.unitOfMeasure = $('input[name=unitOfMeasure]').val();

                fujiDebug.append('Unit of Measurement saved: ' +tools._data.unitOfMeasure);
                tools._data.settingsSet = true;

                $('.glyphicon-pencil').removeClass('disabled');

                //start grid
                grid.setId(gridId);
                grid.create();
                $('#toolSettings').hide();
            }
    }
}






;