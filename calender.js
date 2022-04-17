import React from "react";
import dateFns from "date-fns";
import Modal from "./Modal";
import firebase from "../firebase";
import loading from "../loading.gif";
import CalendarLegend from "./CalendarLegend";
import IconSource from "./IconSource";

class Calendar extends React.Component {
  state = {
    currentMonth: new Date(),
    selectedDate: new Date(),
    showModal: false,
    dateID: "",
    dateIDms: "",
    averageCycle: "",
    averageLength: "",
    lastPeridoInfo: "",
    dataFromServer: "",
    listOfPeriods: "",
  };

  getDataFromServer = async () => {
    const data = await firebase.auth().onAuthStateChanged((authUser) => {
      if (authUser) {
        firebase
          .database()
          .ref("data/" + authUser.uid)
          .on("value", (snapshot) => {
            if (snapshot.val() === null) {
              this.setState({
                dataFromServer: [],
              });
            } else {
              this.setState({
                dataFromServer: snapshot.val().map((item) => item),
              });
            }
          });
      }
    });
  };
  componentWillMount() {
    this.getDataFromServer();
  }
  renderHeader = () => {
    const dateFormat = "MMMM YYYY";

    return (
      <div className="header row flex-middle">
        <div className="col col-start">
          <div className="icon" onClick={this.prevMonth}>
            chevron_left
          </div>
        </div>
        <div className="col col-center">
          <span>{dateFns.format(this.state.currentMonth, dateFormat)}</span>
        </div>
        <div className="col col-end" onClick={this.nextMonth}>
          <div className="icon">chevron_right</div>
        </div>
      </div>
    );
  };

  renderDays = () => {
    const dateFormat = "dddd";
    let startDate = dateFns.startOfWeek(this.state.currentMonth);
    let days = [];

    for (let i = 0; i < 7; i++) {
      days.push(
        <div className="col col-center" key={i}>
          {dateFns.format(dateFns.addDays(startDate, i), dateFormat)}
        </div>
      );
    }
    return <div className="days row">{days}</div>;
  };

  getPeriodData() {
    const dataFromServer = this.state.dataFromServer;
    if (dataFromServer.length === 0) return;

    let today = new Date();
    today = today.toString().slice(0, 15);
    today = dateFns.format(today, "x");

    let daysOfPeriod = [];
    let listOfPeriods = [];

    const periodArr = dataFromServer.filter((data) => data.period);

    periodArr.findIndex((day, index) => {
      let nextDayInArr = periodArr[index + 1];

      if (nextDayInArr) {
        let dayDifference = Math.round(
          (nextDayInArr.dateIDms - day.dateIDms) / 86400000
        );
        if (dayDifference === 1) {
          daysOfPeriod.push(day);
        } else {
          daysOfPeriod.push(day);
          listOfPeriods.push(daysOfPeriod);
          daysOfPeriod = [];
        }
      }

      if (!nextDayInArr) {
        daysOfPeriod.push(day);
        listOfPeriods.push(daysOfPeriod);
        daysOfPeriod = [];
      }
    });

    const lastPeridoInfo = listOfPeriods[listOfPeriods.length - 1];
    this.state.lastPeridoInfo = lastPeridoInfo;
    this.state.listOfPeriods = listOfPeriods.reverse();
    this.averageCycle();
    this.averageLength();
  }
  averageCycle = () => {
    const data = this.state.listOfPeriods;
    if (data.length === 0) return;

    let listOfCycle = data.map((period, index) => {
      let prevPeriod = data[index + 1];
      if (prevPeriod) {
        const cycle = Math.round(
          (period[0].dateIDms - prevPeriod[0].dateIDms) / 86400000
        );
        return cycle;
      } else {
        return "---";
      }
    });

    listOfCycle = listOfCycle.filter((cycle) => typeof cycle === "number");

    if (listOfCycle.length !== 0) {
      const sum = listOfCycle.reduce((a, b) => a + b);
      const average = Math.round(sum / listOfCycle.length);
      this.state.averageCycle = average;
    }
  };

  averageLength = () => {
    const data = this.state.listOfPeriods;
    if (data.length === 0) return;

    const listOfLength = data.map((period) => period.length);
    const sum = listOfLength.reduce((a, b) => a + b);
    const average = Math.round(sum / listOfLength.length);
    this.state.averageLength = average;
  };

  renderCells = () => {
    this.getPeriodData();
    const dataFromServer = this.state.dataFromServer;
    const { currentMonth, selectedDate } = this.state;
    const monthStart = dateFns.startOfMonth(currentMonth);
    const monthEnd = dateFns.endOfMonth(monthStart);
    const startDate = dateFns.startOfWeek(monthStart);
    const endDate = dateFns.endOfWeek(monthEnd);
    const dateFormat = "D";
    const rows = [];
    let days = [];
    let day = startDate;
    let formattedDate = "";

    let noteIcon;
    let intercourseIcon;
    let medicineIcon;
    let symptomsIcon;
    let temperatureIcon;
    let ovulationIcon;
    let messageToday;
    let moodsIcon;

    while (day <= endDate) {
      for (let i = 0; i < 7; i++) {
        formattedDate = dateFns.format(day, dateFormat);

        const cloneDay = day;
        const dateID = day.toString().slice(0, 15);
        const dateIDms = dateFns.format(day, "x");
        let css = [];

        // ============== adding CSS ==================================
        if (dataFromServer) {
          dataFromServer.find((obj) => {
            if (obj.date === dateID) {
              if (obj.period) {
                css.push("period-start");
              }
              if (obj.ovulation) {
                css.push("ovulation");
                ovulationIcon = (
                  <img src="https://img.icons8.com/office/20/000000/sunny-side-up-eggs.png" />
                );
              }

              if (obj.medicine) {
                css.push("medicine");
                medicineIcon = (
                  <img src="https://img.icons8.com/ultraviolet/20/000000/pill.png" />
                );
              }

              if (obj.intercourse) {
                css.push("intercourse");
                intercourseIcon = (
                  <img src="https://img.icons8.com/office/20/000000/hearts.png" />
                );
              }

              if (obj.symptoms !== "") {
                symptomsIcon = (
                  <img src="https://img.icons8.com/color/20/000000/question.png" />
                );
              }

              if (obj.note !== "") {
                noteIcon = (
                  <img src="https://img.icons8.com/ios/20/000000/note.png" />
                );
              }

              if (obj.temperature !== "") {
                temperatureIcon = (
                  <img src="https://img.icons8.com/office/20/000000/thermometer.png" />
                );
              }

              if (obj.moods !== "") {
                moodsIcon = (
                  <img src="https://img.icons8.com/office/20/000000/rainbow.png" />
                );
              }
            }
          });
        }

        if (
          this.state.averageCycle !== "" &&
          this.state.averageLength !== "" &&
          this.state.lastPeridoInfo
        ) {
          const prevFist = parseInt(this.state.lastPeridoInfo[0].dateIDms);
          const prevLast = parseInt(
            this.state.lastPeridoInfo[this.state.lastPeridoInfo.length - 1]
              .dateIDms
          );
          const gap = dateIDms - prevFist;

          if (dateIDms > prevFist) {
            if (gap % (this.state.averageCycle * 86400000) === 0) {
              css.push("period-estimation");
            }
            if (
              (gap % (this.state.averageCycle * 86400000)) / 86400000 <
              this.state.averageLength
            ) {
              css.push("period-estimation");
            }
          }
        }

        if (!dateFns.isSameMonth(day, monthStart)) {
          css.push("disabled");
        } else if (dateFns.isSameDay(day, selectedDate)) {
          css.push("selected");
        } else {
          css.push("");
        }

        let today = new Date();
        today = today.toString().slice(0, 15);
        today = dateFns.format(today, "x");

        if (dateIDms === today) {
          messageToday = " Today";
        }

        css = css.join(" ");

        // ============== /adding CSS ==================================

        days.push(
          <div
            className={`col cell ${css}`}
            key={dateID}
            id={dateID}
            onClick={() =>
              this.onDateClick(dateFns.parse(cloneDay), dateID, dateIDms)
            }
          >
            <span className="number">{formattedDate}</span>

            <span className="today">{messageToday}</span>
            <p />
            {intercourseIcon}
            {medicineIcon}
            {symptomsIcon}
            {noteIcon}
            {temperatureIcon}
            {ovulationIcon}
            {moodsIcon}
          </div>
        );
        messageToday = "";
        intercourseIcon = "";
        medicineIcon = "";
        symptomsIcon = "";
        noteIcon = "";
        temperatureIcon = "";
        ovulationIcon = "";
        moodsIcon = "";
        day = dateFns.addDays(day, 1);
      }
      rows.push(
        <div className="row" key={day}>
          {days}
        </div>
      );
      days = [];
    }
    // end = false;
    return <div className="body">{rows}</div>;
  };

  onDateClick = (day, dateID, dateIDms) => {
    this.showModal(dateID, dateIDms);
    this.setState({
      selectedDate: day,
    });
  };
  nextMonth = () => {
    this.setState({
      currentMonth: dateFns.addMonths(this.state.currentMonth, 1),
    });
  };
  prevMonth = () => {
    this.setState({
      currentMonth: dateFns.subMonths(this.state.currentMonth, 1),
    });
  };

  // ============== modal ===========================

  showModal = (dateID, dateIDms) => {
    this.setState({
      showModal: true,
      dateID: dateID,
      dateIDms: dateIDms,
    });
  };

  hideModal = () => {
    this.setState({ showModal: false });
  };

  // ============== render ===========================
  render() {
    return (
      <div>
        {this.state.dataFromServer === "" ? (
          <img src={loading} />
        ) : (
          <div>
            <div className="calendar">
              <Modal
                showModal={this.state.showModal}
                dateID={this.state.dateID}
                dateIDms={this.state.dateIDms}
                handleClose={this.hideModal}
              />

              {this.renderHeader()}
              {this.renderDays()}
              {this.renderCells()}
            </div>
            <div style={{ display: "flex" }}>
              <CalendarLegend />
              <IconSource />
            </div>
          </div>
        )}
      </div>
    );
  }
}

export default Calendar;
