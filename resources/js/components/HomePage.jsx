
import React from 'react'


const clickme = () =>{

    return(
        console.log('clicked me ')
    );
}

const Homepage = () => {
  return (
    <div>
    <h1>Home Page !</h1>
    <button onClick={clickme} type="button" className='btn'>Purple</button>

    </div>
  )
}

export default Homepage
