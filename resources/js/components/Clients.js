import axios from 'axios'
import React, { useEffect, useRef } from 'react'
import ReactDOM from 'react-dom'

function Clients() {
    const [clients, setClients] = React.useState([])

    useEffect(() => {
        getClient()
    }, [])

    function getClient() {
        axios.get('/oauth/clients')
            .then(response => {
                setClients(response.data)
            })
            .catch(error => {
                console.log(error)
            })
    }

    function addClient(e) {
        e.preventDefault()
        axios.post('/oauth/clients', {
            name: e.target.name.value,
            redirect: e.target.redirect.value
        }).then(response => {
            getClient()
        }).catch(error => {
            console.log(error)
        })
    }


    function deleteClient(id) {
        let confirmDelete = confirm('Are you sure you want to delete this client?')
        if (confirmDelete) {
            axios.delete('/oauth/clients/' + id)
                .then(response => {
                    getClient()
                }).catch(error => {
                    console.log(error)
                })
        }
    }

    return (
        <div className="card border-0">
            <div className="card-header bg-white">
                List of Clients
            </div>
            <form onSubmit={addClient} className="row px-3 mt-3 m-0">
                <div className="col-md-5 px-1">
                    <input className="form-control form-control-sm bg-white" type="text" name="name"
                        placeholder="Client Name" />
                </div>
                <div className="col-md-5 px-1">
                    <input className="form-control form-control-sm bg-white" type="text" name="redirect"
                        placeholder="Redirect" />
                </div>
                <div className="col-md-2 px-1">
                    <button type="submit" className="btn btn-sm btn-primary w-100">Add Client</button>
                </div>
            </form>
            <div className="card-body">
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Callback</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {clients.map((client, i) => (
                            <tr key={i}>
                                <td className="align-middle">{client.id}</td>
                                <td className="align-middle">
                                    <p className="m-0">{client.name}</p>
                                    <span
                                        className="alert-danger text-danger"><small>{client.secret}</small></span>
                                </td>
                                <td className="align-middle">{client.redirect}</td>
                                <td className="align-middle">
                                    <button onClick={() => deleteClient(client.id)} className="text-danger btn btn-sm p-0"><i className="fas fa-fw fa-trash"></i></button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    )
}

export default Clients

if (document.getElementById('clients')) {
    ReactDOM.render(<Clients />, document.getElementById('clients'))
}
