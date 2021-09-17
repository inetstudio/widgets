import {widgets} from './package/widgets';

require('./plugins/tinymce/plugins/widgets');

require('./mixins/widget');

require('./stores/widgets');

window.Vue.component(
    'EmbeddedWidget',
    require('./components/partials/EmbeddedWidget/EmbeddedWidget.vue').default,
);

widgets.init();
