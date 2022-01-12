import React, { Component } from "react";
import Navigation from "../Navbar/Navbar";
import Spinner from "../Loader/Loader";
import Aux from "../../HOC/Auxilary";
import classes from "./Content.module.css";
import Search from "./Search/Search";
import CardList from "./CardList/CardList";

class Content extends Component {
  state = {
    robots: [],
    searchField: "",
    btnClicked: false,
  };

  onButtonClick = () => {
    this.setState({ btnClicked: !this.state.btnClicked });
    const timer = setTimeout(() => {
      fetch("https://reqres.in/api/users?page=1")
        .then((response) => {
          return response.json();
        })
        .then((users) => {
          this.setState({ robots: users.data });
        });
    }, 5000);
    return () => clearTimeout(timer);
  };

  searchBarChange = (event) => {
    this.setState({ searchField: event.target.value });
  };

  render() {
    const filteredRobots = this.state.robots.filter((robots) => {
      return robots.first_name
        .toLowerCase()
        .includes(this.state.searchField.toLowerCase());
    });

    if (this.state.btnClicked === false && this.state.robots.length === 0) {
      return (
        <Aux>
          <Navigation
            onclicked={this.onButtonClick}
            clicksts={this.state.btnClicked}
          />
          <div className={classes.Preload}>
            <h3>Please Click the Get Users button to get users information.</h3>
          </div>
        </Aux>
      );
    } else if (
      this.state.btnClicked === true &&
      this.state.robots.length === 0
    ) {
      return (
        <Aux>
          <Navigation
            onclicked={this.onButtonClick}
            clicksts={this.state.btnClicked}
          />
          <div className={classes.Loader}>
            <Spinner />
          </div>
        </Aux>
      );
    } else {
      return (
        <Aux>
          <Navigation
            onclicked={this.onButtonClick}
            clicksts={this.state.btnClicked}
          />
          <div className={classes.fixation}>
            <h1 className={classes.UserPanel}>User Panel</h1>
            <Search searching={this.searchBarChange} />
            <div className={classes.UserList}>
              <div className={classes.lister}>
              <CardList robots={filteredRobots} />
              </div>
            </div>
          </div>
        </Aux>
      );
    }
  }
}

export default Content;
