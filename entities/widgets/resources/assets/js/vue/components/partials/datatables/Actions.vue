<template>
  <div class="btn-nowrap">
    <a href="#" class="btn btn-xs btn-default m-r-xs" @click.prevent="edit">
      <i class="fa fa-pencil-alt"></i>
    </a>
    <a href="#" class="btn btn-xs btn-danger delete" @click.prevent="destroy">
      <i class="fa fa-times"></i>
    </a>
  </div>
</template>

<script>
import Form from '~widgets-package_widgets/components/partials/forms/Widget';
import Swal from 'sweetalert2';

export default {
  name: 'widgets-package_widgets_partials_datatables_actions',
  props: {
    itemProp: {
      type: Object,
      required: true
    }
  },
  methods: {
    edit() {
      let component = this;

      component.$modal.show(
          Form,
          {
            componentProp: component.itemProp.widget_name,
            widgetProp: component.itemProp,
            save: () => {
              component.$emit('component-event', {
                event: 'itemUpdated',
                data: {
                  item: component.itemProp
                }
              });
            }
          },
          {
            adaptive: true,
            height: 'auto',
            minWidth: 800
          }
      );
    },
    destroy() {
      let component = this;

      let url = route('inetstudio.widgets-package.widgets.back.resource.destroy', component.itemProp.id).toString();
      let requestData = {
        _method: 'DELETE'
      };

      Swal.fire({
        title: "Вы уверены?",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Отмена",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Да, удалить"
      }).then((result) => {
        if (result.value) {

          axios.post(url, requestData)
              .then(response => {
                if (response.data.success === true) {
                  component.$emit('component-event', {
                    event: 'itemDestroyed',
                    data: {
                      item: component.itemProp
                    }
                  });

                  Swal.fire({
                    title: "Запись удалена",
                    icon: "success"
                  });

                  return;
                }

                component.alertError();
              })
              .catch(error => {
                component.alertError();
              });
        }
      });
    },
    alertError() {
      Swal.fire({
        title: "Ошибка",
        text: "При удалении произошла ошибка",
        icon: "error"
      });
    }
  }
};
</script>

<style scoped>

</style>
