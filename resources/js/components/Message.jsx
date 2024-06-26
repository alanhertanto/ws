import React from "react";

const Message = React.forwardRef(({ userId, message }, ref) => {
    return (
        <div className={`row ${userId === message.user_id ? "justify-content-end" : ""}`} ref={ref}>
            <div className="col-md-6">
                <small className="text-muted float-right">
                    {message.time}
                </small>
                <small className="text-muted">{message.name}</small>
                <div className={`alert alert-${userId === message.user_id ? "primary" : "secondary"}`} role="alert">
                    {message.text}
                </div>
            </div>
        </div>
    );
});

export default Message;
