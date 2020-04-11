export default {
    props: ['liveuser'],

    template: `
    <div class="col-xs-12 col-sm-6 col-md-4 mx-auto">
        <div class="card rounded" @click="navToUserHome()">
            <div class="card-body text-center">
            <p>{{ liveuser.page_title}}</p>
            </div>
        </div>
    </div>`,

    methods: {
        navToUserHome() {
            //debugger;

            localStorage.setItem("cachedUser", JSON.stringify(this.liveuser));

            //send this user to its home page , and pass the user object to the home page
            this.$router.push({ name: "page1", params: { currentcontent: this.liveuser }})
        }
    }

}