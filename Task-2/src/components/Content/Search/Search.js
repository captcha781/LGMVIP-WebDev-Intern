import React from "react";

const styles = {
  border: "0px",
  borderRadius: "20px",
  padding: "10px 10px",
  boxShadow: "1.5px 1.5px 3px 2px rgba(0,0,0,0.2)",
  position: 'absolute',
  left: '50%',
  transform: 'translate(-50%,0)'
};

const search = (props) => {
  return (
    <input
      type="search"
      placeholder="Type Here To Search"
      onChange={props.searching}
      style={styles}
    />
  );
};

export default search;
