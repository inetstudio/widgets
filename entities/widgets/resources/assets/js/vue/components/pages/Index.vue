<template>
  <div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <create-widget
                v-on:widget-saved="updateTable"
            ></create-widget>
          </div>
          <div class="ibox-content">
            <datatable
                v-bind:attributesProp="datatable.attributes"
                v-bind:optionsProp="datatable.options"
                v-bind:eventsProp="datatable.events"
                ref="table"
            ></datatable>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'widgets-package_widgets_pages_index',
  components: {
    'create-widget': () => import('~widgets-package_widgets/components/partials/buttons/CreateWidget'),
    'datatable': () => import('~admin-panel/components/blocks/datatables/Datatable')
  },
  props: {
    datatableProp: {
      type: Object,
      default() {
        return {
          attributes: {},
          options: {},
          events: {}
        }
      }
    }
  },
  data() {
    let component = this;

    return {
      datatable: _.cloneDeep(component.datatableProp)
    }
  },
  methods: {
    updateTable() {
      let component = this;

      component.$refs.table.update();
    }
  }
};
</script>

<style scoped>

</style>
