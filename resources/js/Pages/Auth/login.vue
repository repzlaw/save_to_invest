<template>
  <div>
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <b-col md="6" class="mx-auto app-login-box" >
          <div class="text-center">
            <img src="/logo/logo-black.png" style="width:100px;"/>
          </div>
          <!-- <div class="app-logo-inverse mx-auto mb-3" /> -->
          <b-form @submit.prevent="submit">
            <div class="modal-dialog w-100 mx-auto" >
              <div class="modal-content" style="border-radius:1.25rem 1.25rem 1.25rem 0%; box-shadow:#000000 0px 0px 20px;">
                <div class="modal-body" >
                  <div class="h5 modal-title text-center">
                    <h4 class="mt-2">
                      <div>
                        <strong class="text-primary font-bold font-display text-center">Login to your account</strong>
                        <div>
                          <strong style="font-size:14px;">securely login to save to invest</strong>
                        </div>
                      </div>
                    </h4>
                  </div>
                  <b-form-group
                    id="authEmailInputGroup"
                    label-for="authEmailInput"
                    description="We'll never share your email with anyone else."
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

                  <b-form-checkbox v-model="form.remember" id="exampleCheck">
                    Keep me logged in
                  </b-form-checkbox>
                  <div class="divider" />
                  <h6 class="mb-0">
                    Don't have an account?
                    <inertia-link class="text-primary" :href="route('register')"
                      >Register</inertia-link
                    >
                  </h6>
                </div>
                <div class="modal-footer clearfix" style="border-radius:5%">
                  <div class="float-left">
                    <inertia-link
                      class="btn-lg btn btn-link"
                      :href="route('password.request')"
                      >Recover Password</inertia-link
                    >
                  </div>
                  <div class="float-right">
                    <b-button variant="primary" type="submit" size="lg"
                      >Login to Dashboard</b-button
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
        email: null,
        password: null,
        remember: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("login"), this.form);
    },
  },
};
</script>

<style>
</style>
