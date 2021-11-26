<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";

export default {
  props: { user_data: Object },
  components: {
    PageTitle,
  },
  data: () => ({
    heading: "Profile",
    subheading: ".",
    icon: "pe-7s-plane icon-gradient bg-tempting-azure",
  }),
  layout: (h, page) => h(Main, [page]),
};
</script>

<style>
</style>
