import React from "react";
import classes from './Loader.module.css';

const spinner = () => {
  return (
    <div className={classes.ctn}>
      <div className={classes.loader}></div>
    </div>
  );
};

export default spinner;
