<template>
  <div class="btn-group">
    <template v-if="options.ready">
      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Добавить</button>
      <ul class="dropdown-menu">
        <li v-for="(title, widgetName) in options.widgets" :key="widgetName"><a class="dropdown-item" href="#" @click.prevent="createWidget(widgetName)">{{ title }}</a></li>
      </ul>
    </template>
  </div>
</template>

<script>
import Form from '~widgets-package_widgets/components/partials/forms/Widget';

export default {
  name: 'widgets-package_widgets_partials_buttons_create-widget',
  data() {
    return {
      options: {
        ready: false,
        widgets: []
      }
    };
  },
  methods: {
    createWidget(widgetName) {
      let component = this;

      component.$modal.show(
          Form,
          {
            componentProp: widgetName,
            save: () => {
              component.$emit('widget-saved');
            }
          },
          {
            adaptive: true,
            height: 'auto',
            minWidth: 800
          }
      );
    }
  },
  created: function () {
    let component = this;

    let url = route('back.admin-panel.config.get', 'inetstudio.widgets-package.widgets.widgets_list');

    axios.post(url).then(response => {
      component.options.widgets = response.data;
      component.options.ready = true;
    });
  },
};
</script>

<style scoped>

</style>
