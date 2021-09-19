import Swal from 'sweetalert2';

export let widgets = {
    init: function() {
        window.Admin = window.Admin || {
            options: {
                tinymce: {}
            },
            modules: {}
        };

        $.extend(window.Admin.options.tinymce, {
            init_instance_callback: function (editor) {
                editor.on('change redo undo', function (e) {
                    let content = $(editor.getContent()),
                        widgets = content.find('.content-widget');

                    $('input[name=widgets]').val(widgets.map(function () {
                            return $(this).attr('data-id');
                        }).get()
                    );
                });
            }
        });

        $.extend(window.Admin.modules, {
            widgets: {
                getWidget: function () {
                    let widgetId = arguments[0],
                        callback = (1 in arguments) ? arguments[1] : undefined;

                    $.ajax({
                        url: route('back.widgets.show', widgetId),
                        method: 'GET',
                        dataType: 'json',
                        success: function (widget) {
                            if (typeof callback !== 'undefined') {
                                callback(widget);
                            }
                        },
                        error: function () {
                            Swal.fire({
                                title: "Ошибка",
                                text: "Произошла ошибка при получении виджета",
                                icon: "error"
                            });
                        }
                    });
                },
                saveWidget: function () {
                    let widgetId = arguments[0],
                        widgetData = arguments[1],
                        widgetOptions = arguments[2],
                        callback = (3 in arguments) ? arguments[3] : undefined;

                    let url = (widgetId !== '') ? route('back.widgets.update', widgetId): route('back.widgets.store');

                    if (widgetId !== '') {
                        $.extend(widgetData, {
                            _method: 'PUT'
                        })
                    }

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: widgetData,
                        dataType: 'json',
                        success: function (widget) {
                            widgetOptions.editor.execCommand('mceReplaceContent', false, '<img class="content-widget" data-type="'+widgetOptions.type+'" data-id="'+widget.id+'" alt="'+widgetOptions.alt+'" style="height: 100px; width: 100%; border: 1px red solid;" />');

                            if (typeof callback !== 'undefined') {
                                callback(widget);
                            }
                        }
                    });
                }
            }
        });
    }
};
