export default {
    props: ['currentcontent'],

    template: `<div> 
        <h1>{{ currentcontent.main_title }}</h1>
        <p>{{ currentcontent.description}}</p>
    </div>
    `,
}

