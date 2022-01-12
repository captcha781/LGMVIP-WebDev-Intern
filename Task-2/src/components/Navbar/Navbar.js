// Navigation Component
import React from "react";
import classes from "./Navbar.module.css";

function navigation(props) {
  return (
    <nav className={classes.Nav}>
      <h2 className={classes.Brand}>Brand</h2>
      {props.clicksts ? (
        <a href="https://twitter.com/iamrealbhuvi">
          <button className={classes.Follow}>Follow Me</button>
        </a>
      ) : (
        <button className={classes.Userbtn} onClick={props.onclicked}>
          Get Users
        </button>
      )}
    </nav>
  );
}

export default navigation;
