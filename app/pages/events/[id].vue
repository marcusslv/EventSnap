<script>

export default defineComponent({
  name: 'EventsEditPage',
  async setup() {
    console.log('setup: EventsEditPage')
    const event = ref(null)
    const form = ref({
      title: {
        value: "",
        errors: [],
      },
      description: {
        value: "",
        errors: [],
      },
      location: {
        value: "",
        errors: [],
      },
      date: {
        value: "",
        errors: [],
      }
    });

    return {
      event,
      form
    }
  },
  async created() {
    console.log('created: EventsEditPage')
    await this.fetchShowEvent()
    this.startForm()
  },
  methods: {
    async fetchShowEvent() {
      const route = useRouter();
      const params = route.currentRoute.value.params;

      const response = await useFetch(`http://127.0.0.1:8000/api/events/${params.id}`, {
        method: 'GET',
        params: {
          with: ['user']
        },
      });

      if (response.status.value !== 'success') {
        console.error('Failed to fetch event')
        return
      }

      this.event = response.data.value.event
    },
    startForm() {
      this.form.title.value = this.event.title
      this.form.description.value = this.event.description
      this.form.location.value = this.event.location
      const date = new Date(this.event.date);

      this.form.date.value = `${date.getFullYear()}-${date.getMonth()}-${date.getDate()}`
    },
    async submitForm() {
      const response = await useFetch(`http://127.0.0.1:8000/api/events/${this.event.id}`, {
        method: 'PUT',
        body: {
          title: this.form.title.value,
          description: this.form.description.value,
          location: this.form.location.value,
          date: this.form.date.value,
        }
      })

      const statusText = response.status.value;

      switch (statusText) {
        case 'success':
          useRouter().push('/events');
          break;
        case 'error':
          if (response.error.value.statusCode === 422) {
            const errors = response.error.value.data.errors;

            for (const key in errors) {
              this.form[key].errors = errors[key];
            }

            break;
          }
          
          alert('Failed to create event');
          break;
      }
    },
    resetErroByField(field) {
      this.form[field].errors = [];
    },
  }
})

</script>


<template>
  <div class="wrapper-create">
    <div class="wrapper-create__header">
      <h1>Edit Event: </h1>
    </div>
    <div class="wrapper-create__content">
      <form 
        class="wrapper-create__content-form" 
        @submit.prevent="submitForm"
      >
        <div class="wrapper-create__content-form__input">
          <label for="title">Title</label>
          <input type="text" name="title" v-model="form.title.value" @input="resetErroByField('title')">
          <span class="error" v-if="form.title.errors.length">
            {{ form.title.errors.join('\n') }}
          </span>
        </div>
        <div class="wrapper-create__content-form__input">
          <label for="title">Description</label>
          <textarea 
            name="description" 
            rows="4" cols="50" 
            v-model="form.description.value"
            @input="resetErroByField('description')"
          ></textarea>
          <span class="error" v-if="form.description.errors.length">
            {{ form.description.errors.join('\n') }}
          </span>
        </div>
        <div class="wrapper-create__content-form__input">
          <label for="location">Location</label>
          <input 
            type="text" 
            name="location"
            v-model="form.location.value" 
            @input="resetErroByField('location')"
          >
          <span class="error" v-if="form.location.errors.length">
            {{ form.location.errors.join('\n') }}
          </span>
        </div>
        <div class="wrapper-create__content-form__input">
          <label for="date">Date</label>
          <input 
            type="date" 
            name="date" 
            v-model="form.date.value"
            @input="resetErroByField('date')"
          >
          <span class="error" v-if="form.date.errors.length">
            {{ form.date.errors.join('\n') }}
          </span>
        </div>

        <div class="wrapper-create__content-form__buttons">
          <button class="back" @click="useRouter().push('/events')">Back</button>
          <button type="submit">Salvar</button>
        </div>
      </form>

    </div>
  </div>
</template>

<style scoped lang="css">
.wrapper-create {
  display: flex;
  flex-direction: column;
  gap: 24px;
  padding: 0 72px;
  width: 100%;
}

.wrapper-create__header {
  display: flex;
  justify-content: space-between;
  align-items: center;

}

.whapper-create__herder-action {
  text-decoration: none;
  color: var(--color-text);
  width: 112px;
  border-bottom: 1px solid transparent;
}

.wrapper-create__content {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;

  padding: 24px 48px;
}

.wrapper-create__content-form {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-large);
  width: 100%;
}

.wrapper-create__content-form__input {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-xsmall);
  width: 100%;
}

.wrapper-create__content-form__input label {
  font-size: var(--font-size-small);
}

.wrapper-create__content-form__input input {
  padding: 8px;
  border: 1px solid var(--color-dark);
  border-radius: 4px;
}

.wrapper-create__content-form__buttons {
  display: flex;
  gap: var(--spacing-small);
  justify-content: flex-end;
}

.wrapper-create__content-form__buttons button[type="submit"] {
  padding: 8px;
  background-color: var(--color-dark);
  color: var(--color-white);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 112px;
}

.wrapper-create__content-form__buttons .back {
  padding: 8px;
  background-color: var(--color-white);
  color: var(--color-dark);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 112px;
}
</style>
