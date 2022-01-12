import React from "react";
import classes from "./Cards.module.css";
const cards = (props) => {
  return (
    <div className={classes.MainCard}>
      <div>
        <img
          className={classes.Image}
          alt="robots"
          src={`https://reqres.in/img/faces/${props.id}-image.jpg`}
        />
        <div className={classes.displayer}>
          <h6>
            {props.name} {props.lname}
          </h6>

          <h6>{props.email}</h6>
        </div>
      </div>
    </div>
  );
};

export default cards;
