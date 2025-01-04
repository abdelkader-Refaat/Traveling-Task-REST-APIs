import React from 'react'
import Router from '../router/index'
import { NavLink } from 'react-router-dom'
const App = () => {
  return (
    <div >
        <h1 className='text-red-600 bg-blue-400 '>Hello App !</h1>
        <button type="button" className='text-black bg-gradient-to-r'>Cyan</button><br/>



        <nav>
            <NavLink to='/' className={({isActive}) => (isActive ? 'active' : '')}>
                go to home
            </NavLink>
            <NavLink to='/about' className={({isActive}) => (isActive ? 'active' : '')}>
                go to about Page
            </NavLink>

        </nav>
        <Router />
    </div>
  )
}

export default App
