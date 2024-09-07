<script>
export default defineComponent({
  name: 'EventsPage',
  setup() {

    const events = ref([])

    return {
      events
    }
  },
  // mounted() {
  //   this.fetchEvents()
  // },
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
    }
  },
})

</script>

<template>
  <div>
    <h1>Events Page</h1>

    <button @click="fetchEvents">Fetch Events</button>

    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Date</th>
          <th>Event Location</th>
          <th>Photographer</th>
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
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped lang="css">

</style>
