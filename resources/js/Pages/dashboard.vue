<template>
  <transition name="fade" mode="out-in">
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
  </transition>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";

export default {
  components: {
    PageTitle,
  },
  data: () => ({
    heading: "Dashboard",
    subheading: ".",
    icon: "pe-7s-plane icon-gradient bg-tempting-azure",
  }),
  layout: (h, page) => h(Main, [page]),
};
</script>

<style>
</style>
