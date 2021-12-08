<template>
  <div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox">
          <div class="ibox-title text-center">
            <h3>Виджет</h3>
            <div class="ibox-tools">
              <a class="close-link" @click.prevent="$emit('close')">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content" v-bind:class="{'sk-loading': isLoading}">
            <div class="sk-spinner sk-spinner-double-bounce">
              <div class="sk-double-bounce1"></div>
              <div class="sk-double-bounce2"></div>
            </div>

            <component
                :is="componentProp"
                v-bind:itemModelProp="widgetProp"
                v-on:close="$emit('close')"
                v-on:saved="widgetSaved"
                v-on:component-ready="ready"
                v-on:start-loading="startLoading"
                v-on:stop-loading="stopLoading"
                ref="widget"
            >
              <template v-slot:additionalFields="componentData">
                <base-input-text
                    label = "Виджет"
                    name = "widget_name"
                    v-bind:value.sync = "componentData.item.model.widget_name"
                />

                <base-input-text
                    label = "Название"
                    name = "title"
                    v-bind:value.sync = "componentData.item.model.title"
                />

                <base-input-text
                    label = "Алиас"
                    name = "alias"
                    v-bind:value.sync = "componentData.item.model.alias"
                />

                <base-input-text
                    label = "Категория"
                    name = "category"
                    v-bind:value.sync = "componentData.item.model.category"
                />

                <base-input-text
                    label = "Представление"
                    name = "view"
                    v-bind:value.sync = "componentData.item.model.view"
                />
              </template>
            </component>

          </div>
          <div class="ibox-footer">
            <div class="modal-buttons">
              <a href="#" class="btn btn-default" @click.prevent="$emit('close')">Закрыть</a>
              <a href="#" class="btn btn-primary" @click.prevent="saveWidget">Сохранить</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import stateMixin from '~admin-panel/mixins/state';

export default {
  name: 'widgets-package_widgets_partials_forms_widget',
  props: {
    componentProp: {
      type: String,
      required: true
    },
    widgetProp: {
      type: Object,
      default() {}
    },
    save: {
      type: Function,
      default() {}
    }
  },
  methods: {
    saveWidget() {
      let component = this;

      component.$refs.widget.save();
    },
    widgetSaved() {
      let component = this;

      component.$emit('close');
      component.save();
    }
  },
  mixins: [
    stateMixin
  ]
};
</script>

<style scoped>
  .ibox-title {
    border: none;
  }
  .modal-buttons {
    float: right;
  }
</style>
