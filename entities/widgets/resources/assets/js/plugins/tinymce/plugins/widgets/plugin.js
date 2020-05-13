window.tinymce.PluginManager.add('widgets', function (editor) {
    let widgetData = {
        widget: {
            events: {
                widgetSaved: function(model) {
                    editor.execCommand(
                        'mceReplaceContent',
                        false,
                        '<img class="content-widget" data-type="embedded" data-id="' + model.id + '" alt="Виджет-код" />',
                    );
                },
            },
        },
    };

    function loadWidget() {
        let component = window.Admin.vue.helpers.getVueComponent('widgets-package', 'EmbeddedWidget');

        component.$data.model.id = widgetData.model.id;
    }

    editor.addButton('add_embedded_widget', {
        title: 'Встраиваемый код',
        icon: 'codesample',
        onclick: function () {
            editor.focus();

            let content = editor.selection.getContent();
            let isEmbedded = /<img class="content-widget".+data-type="embedded".+>/g.test(content);

            if (content === '' || isEmbedded) {
                widgetData.model = {
                    id: parseInt($(content).attr('data-id')) || 0,
                };

                window.Admin.vue.helpers.initComponent('widgets-package', 'EmbeddedWidget', widgetData);

                window.waitForElement('#add_embedded_widget_modal', function() {
                    loadWidget();

                    $('#add_embedded_widget_modal').modal();
                });
            } else {
                swal({
                    title: 'Ошибка',
                    text: 'Необходимо выбрать виджет-код',
                    type: 'error',
                });

                return false;
            }
        }
    })
});
