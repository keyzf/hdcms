<template>
  <div>
    <error />
    <navigate />
    <div class="container-fluid bg pt-2">
      <quick-menu class="pt-5 pb-4" />
      <div class="card">
        <div class="card-body">
          <router-view></router-view>
        </div>
      </div>
      <copyright />
    </div>
  </div>
</template>
<script>
import Navigate from '@/views/layouts/Navigate'
import QuickMenu from '@/views/layouts/QuickMenu'
import Copyright from '@/views/layouts/Copyright'
import Error from '@/components/Error'
import store from '@/store'
export default {
  async beforeRouteEnter(to, from, next) {
    await Promise.all([
      store.dispatch(`user/get`),
      store.dispatch('systemConfig/get')
    ])
    next()
  },
  components: {
    Error,
    Navigate,
    QuickMenu,
    Copyright
  }
}
</script>
<style lang="scss" scoped>
.bg {
  background-image: url('../../assets/images/bg.jpg');
  height: 100vh;
  background-size: cover;
}
</style>
