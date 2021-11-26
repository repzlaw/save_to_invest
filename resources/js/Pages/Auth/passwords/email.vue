<template>
  <div>
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <b-col md="8" class="mx-auto app-login-box">
          <div class="app-logo-inverse mx-auto mb-3" />
          <b-form @submit.prevent="submit">
            <div class="modal-dialog w-100 mx-auto">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="h5 modal-title text-center">
                    <h4 class="mt-2">
                      <div>Reset Password,</div>
                    </h4>
                  </div>
                  <div class="alert alert-success" role="alert" v-if="status">
                    {{ status }}
                  </div>
                  <b-form-group
                    id="authEmailInputGroup"
                    label-for="authEmailInput"
                  >
                    <b-form-input
                      id="authEmailInput"
                      type="email"
                      v-model="form.email"
                      required
                      placeholder="Enter email..."
                      :state="
                        errors.email && errors.email.length > 0 ? false : null
                      "
                      aria-describedby="authEmailInputFeedback"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authEmailInputFeedback">
                      {{ errors.email }}
                    </b-form-invalid-feedback>
                  </b-form-group>
                </div>
                <div class="modal-footer clearfix">
                  <div class="float-left">
                    <inertia-link
                      class="btn-lg btn btn-link"
                      :href="route('login')"
                      >cancel
                    </inertia-link>
                  </div>
                  <div class="float-right">
                    <b-button variant="primary" type="submit" size="lg"
                      >Send Password Reset Link
                    </b-button>
                  </div>
                </div>
              </div>
            </div>
          </b-form>

          <div class="text-center text-white opacity-8 mt-3">
            Copyright &copy; Repzlaw 2022
          </div>
        </b-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: Object,
    status: String,
  },
  remember: {
    data: ["form"],
  },
  data() {
    return {
      form: {
        email: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("password.email"), this.form);
    },
  },
};
</script>

<style>
</style>
