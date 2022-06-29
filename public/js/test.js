console.log(new Date('07-14-2022 14:00:03'))


const projects = [
    {
        name: 'Some Projects',
        estimate_finish_project: new Date('06-25-2022 14:00:03'),
        updated_at: new Date('06-20-2022 14:00:03'),
        created_at: new Date('06-18-2022 14:00:03'),
        finish: false
    },
    {
        name: 'Another Project',
        estimate_finish_project: new Date('06-01-2022 14:00:03'),
        updated_at: new Date('06-04-2022 14:00:03'),
        created_at: new Date('05-25-2022 14:00:03'),
        finish: true
    }
]

// status :
// On Track : if project has running,
// Delay : if project out of the estimated finish date,q
// TBC : if project not running from date created,
projects.forEach(project => {
    let status = 'Live'
    let today = new Date('06-22-2022')
    if (!project.finish) {
        if (project.updated_at === project.created_at) status = 'TCB'
        if (project.updated_at <= today) status = 'On Track'
        if (project.updated_at >= project.estimate_finish_project) status = 'Delay'
    }

    console.log(`Status: ${status}`)
})
