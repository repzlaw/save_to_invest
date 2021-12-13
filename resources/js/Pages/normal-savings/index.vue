<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <normal />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import normal from "./normal";

export default {
  props: {
    user: Object,
  },
  components: {
    PageTitle,
    normal,
  },
  data () {
    return{
    heading: "Normal Savings",
    subheading: "Normal Savings Account",
    icon: "lnr-diamond icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>


