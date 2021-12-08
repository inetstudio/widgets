import itemMixin from '~admin-panel/mixins/item';
import Swal from 'sweetalert2';

export default {
    props: {
        itemModelProp: {
            type: Object,
            default() {
                return {};
            }
        },
        itemEventsProp: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    data: function () {
        let component = this;

        return {
            events: _.merge({
                itemLoaded: function () {},
                itemSaved: function () {}
            }, component.itemEventsProp)
        };
    },
    methods: {
        getItemModel() {
            let component = this;

            if (_.isEmpty(component.itemModelProp)) {
                return _.merge({
                    id: 0,
                    widget_name: '',
                    title: null,
                    alias: null,
                    category: null,
                    view: '',
                    params: {},
                    additional_info: {}
                }, component.getDefaultModelData());
            }

            return _.cloneDeep(component.itemModelProp);
        },
        getItem: function () {
            let component = this;

            let url = route('inetstudio.widgets-package.widgets.back.resource.show', component.item.model.id).toString();

            component.startLoading();

            axios.get(url)
                .then(response => {
                    component.setModel(response.data);
                    component.stopLoading();

                    component.events.itemLoaded(component);
                })
                .catch(error => {
                    component.stopLoading();

                    Swal.fire({
                        title: "Ошибка",
                        text: "Произошла ошибка при получении виджета",
                        icon: "error"
                    });
                });
        },
        saveItem() {
            let component = this;

            let callback = (0 in arguments) ? arguments[0] : undefined;

            let url = (component.item.model.id !== 0)
                ? route('inetstudio.widgets-package.widgets.back.resource.update', component.item.model.id).toString()
                : route('inetstudio.widgets-package.widgets.back.resource.store').toString();

            let data = _.cloneDeep(component.item.model);
            if (data.id !== 0) {
                data._method = 'PUT';
            }

            component.startLoading();

            axios.post(url, data)
                .then(response => {
                    component.setModel(response.data);

                    component.stopLoading();

                    component.events.itemSaved(component.item.model);

                    if (typeof callback !== 'undefined') {
                        callback(component.item.model);
                    }
                })
                .catch(error => {
                    component.stopLoading();

                    Swal.fire({
                        title: "Ошибка",
                        text: "При сохранении виджета произошла ошибка",
                        icon: "error"
                    });
                });
        }
    },
    mixins: [
        itemMixin
    ],
    created() {
        let component = this;

        let model = component.getItemModel();

        component.setModel(model);
    },
    mounted() {
        let component = this;

        component.events.itemLoaded(component);
    }
};
