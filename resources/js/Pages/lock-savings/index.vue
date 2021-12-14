<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <lockSavings />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import lockSavings from "./lockSavings";

export default {
  props: {
  },
  components: {
    PageTitle,
    lockSavings,
  },
  data () {
    return{
    heading: "Lock Savings Savings",
    subheading: "Lock Savings Savings Account",
    icon: "lnr-lock icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>


