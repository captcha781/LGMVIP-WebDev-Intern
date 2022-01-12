import React from 'react';
// import classes from './CardList.module.css';
import Cards from './Cards/Cards';

const cardList = (props) => {
    
    return props.robots.map((user, index) => {
        return (
            <div>
            <Cards
                key={user.id}
                id = {user.id}
                name = {user.first_name}
                lname = {user.last_name}
                email = {user.email}
                 />
                 </div>
        )

    });
    
}

export default cardList;