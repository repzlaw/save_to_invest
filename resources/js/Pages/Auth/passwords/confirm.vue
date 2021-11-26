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
                      <div>Confirm Password,</div>
                      <span
                        >Please confirm your password before continuing.</span
                      >
                    </h4>
                  </div>

                  <b-form-group
                    id="authPasswordInputGroup"
                    label-for="authPasswordInput"
                  >
                    <b-form-input
                      id="authPasswordInput"
                      type="password"
                      v-model="form.password"
                      required
                      :state="
                        errors.password && errors.password.length > 0
                          ? false
                          : null
                      "
                      aria-describedby="authPasswordInputFeedback"
                      placeholder="Enter password..."
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authPasswordInputFeedback">
                      {{ errors.password }}
                    </b-form-invalid-feedback>
                  </b-form-group>

                  <b-form-group
                    id="authPasswordConfirmInputGroup"
                    label-for="authPasswordConfirmInput"
                  >
                    <b-form-input
                      id="authPasswordConfirmInput"
                      type="password"
                      v-model="form.password_confirmation"
                      required
                      autocomplete="new-password"
                      aria-describedby="authPasswordConfirmInputFeedback"
                      placeholder="Confirm password..."
                    >
                    </b-form-input>
                  </b-form-group>

                  <div class="divider" />
                </div>
                <div class="modal-footer clearfix">
                  <div class="float-left">
                    <inertia-link
                      class="btn-lg btn btn-link"
                      :href="route('password.request')"
                      >Forgot Your Password?</inertia-link
                    >
                  </div>
                  <div class="float-right">
                    <b-button variant="primary" type="submit" size="lg"
                      >Confirm Password</b-button
                    >
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
  },
  data() {
    return {
      form: {
        password: null,
        password_confirmation: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("password.confirm"), this.form);
    },
  },
};
</script>

<style>
</style>
