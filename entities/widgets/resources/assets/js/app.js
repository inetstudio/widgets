import Vue from 'vue';
import {widgets} from './package/widgets';

require('./plugins/tinymce/plugins/widgets');

require('./mixins/widget');

require('./stores/widgets');

Vue.component(
    'EmbeddedWidget',
    require('./components/partials/EmbeddedWidget/EmbeddedWidget.vue').default,
);

widgets.init();
