// create a couple of component we can request and render
import Login from "./modules/LoginComponent.js";
import landingComponent from "./modules/landingComponent.js";
import signUpComponent from "./modules/signUpComponent.js";
import ErrorComponent from "./modules/ErrorComponent.js";
import AllUsersComponent from "./modules/AllUsersComponent.js";
import P1Component from "./modules/Page1Component.js";
import P2Component from "./modules/Page2Component.js";
// these are the same as Express routes -> router.get('/', ... do something with the request)
const routes = [
    { path: '/login', name: 'login', component: Login },
    { path: '/', name: 'landing', component: landingComponent },
    { path: '/signUp', name: 'signUp', component: signUpComponent },
    { path: '*', name: 'error', component: ErrorComponent },
    { path: '/user', name: 'user', component: AllUsersComponent },
    { path: '/p1', name: 'page1', component: P1Component, props: true},
    { path: '/p2', name: 'page2', component: P2Component, props: true }
]

const router = new VueRouter({
    routes,
  });

  const vm = new Vue({
    data: {
      authenticated: false,
      administrator: false,
      user: [],

      //currentUser: {},
    },

    methods: {
      setAuthenticated(status, data) {
        this.authenticated = status;
        this.user = data;
      },

      logout() {
        // push user back to login page
        this.$router.push({ path: "/login" });
        this.authenticated = false;

        if (localStorage.getItem("cachedUser")) {
          localStorage.removeItem("cachedUser");
        }
      }
    },

    router: router
  }).$mount("#app");

  // router.beforeEach((to, from, next) => {
  //   //console.log('router guard fired!', to, from, vm.authenticated);

  //   if (vm.authenticated == false) {
  //     next("/login");
  //   } else {
  //     next();
  //   }
  // });



  