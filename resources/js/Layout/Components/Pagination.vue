<template>
  <nav aria-label="Page navigation example" v-if="showPagination">
    <ul class="pagination pagination-sm justify-content-center">
      <li class="page-item" v-for="(link, key) in links" :key="key" v-bind:class="isActive(link)">
        <a
          href="javascript:void(0);"
          class="page-link"
          @click="onEmitEvent(link.url)"
          v-if="link.url"
        >{{ link.label }}</a>
        <a class="page-link" v-else @click.prevent="handleNoLink">{{ link.label }}</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    links: Array,
  },
  computed: {
    showPagination() {
      return true; //this.links.length > 2;
    },
  },
  methods: {
    isActive(link) {
      return link.active === true ? "active" : "normal";
    },
    handleNoLink() {
      return false;
    },
    onEmitEvent(arg1) {
      this.$emit("fetchDataFrom", arg1);
    },
  },
  mounted: function () {},
};
</script>