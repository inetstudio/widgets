import {widgets} from './package/widgets';

require('./plugins/tinymce/plugins/widgets');

require('./mixins/widget');

require('./stores/widgets');

window.Vue.component(
    'EmbeddedWidget',
    () => import('~widgets-package_widgets/components/widgets/EmbeddedWidget/EmbeddedWidget'),
);

window.Vue.component(
    'widgets-package_widgets_partials_datatables_actions',
    () => import('~widgets-package_widgets/components/partials/datatables/Actions'),
);

widgets.init();
