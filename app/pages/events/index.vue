<script>
export default defineComponent({
  name: 'EventsPage',
  setup() {

    const events = ref([])

    return {
      events
    }
  },
  async mounted() {
    await this.fetchEvents()
  },
  methods: {
    async fetchEvents() { 
      const response = await useFetch('http://127.0.0.1:8000/api/events', {
        method: 'GET',
        params: {
          with: ['user']
        },
      });

      if (response.status.value !== 'success') {
        console.error('Failed to fetch events')
        return
      }

      this.events = response.data.value
    },
    redirectPageEdit(event) {
      useRouter().push({ name: 'events-id', params: { id: event.id } })
    },
    async removeEvent(event) {

      useNuxtApp().$swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then(async (result) => {
          if (result.isDenied || result.isDismissed) {
            return;
          }

          const response  = await useFetch(`http://localhost:8000/api/events/${event.id}`, {
            method: 'DELETE',
          });

          if (response.status.value !== 'success') {
              useNuxtApp().$swal.fire("Failed to delete event!", "", "error");

              return
          }

          this.events = this.events.filter((item) => item.id !== event.id)

          useNuxtApp().$swal.fire("Delete!", "", "success");
        });
    }
  },
})

</script>

<template>
  <div class="wrapper-events">
    <div class="wrapper-events__header">
      <h1>List Events</h1>
      <router-link class="wrapper-events__header-action" to="/events/create">Create Event</router-link>
    </div>
    <div class="wrapper-events__content">
      <div v-if="events.length === 0" class="wrapper-events__content-empty">
        <p>No events found</p>
      </div>
      <table v-else class="wrapper-events__content-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Event Location</th>
            <th>Photographer</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="event in events" :key="event.id">
            <td>
              {{ event.title }}
            </td>
            <td>
              {{ event.description }}
            </td>
            <td>
              {{ event.date }}
            </td>
            <td>
              {{ event.location }}
            </td>
            <td>
              {{ event.user.name }}
            </td>

            <td>
              <button class="button" v-on:click.once="redirectPageEdit(event)">Edit</button>
              <button class="button bg-danger" v-on:click.once="removeEvent(event)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped lang="css">
.wrapper-events {
  display: flex;
  flex-direction: column;
  padding: 0 72px;
  gap: 24px;
  width: 100%
}

.wrapper-events__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.wrapper-events__header-action {
  text-decoration: none;
  color: var(--color-text);
  width: 112px;
}

.wrapper-events__header-action:hover {
  color: var(--color-dark);
  border-bottom: 1px solid var(--color-dark);
}

.wrapper-events__header-action:hover:after {
  content: '>';
  font-size: var(--font-size-large);
  margin-left: 4px;
}

.wrapper-events__content-table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: var(--color-dark);
  color: var(--color-white);
}

table th {
  padding: 4px;
}

table td {
  padding: 16px;
}

.wrapper-events__content-empty {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}
</style>
