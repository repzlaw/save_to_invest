<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <mortgage />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import mortgage from "./mortgage";

export default {
  props: {
  },
  components: {
    PageTitle,
    mortgage,
  },
  data () {
    return{
    heading: "Mortgage Savings",
    subheading: "Mortgage Savings Account",
    icon: "lnr-briefcase icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>


