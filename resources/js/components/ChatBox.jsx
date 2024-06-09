import React, { useEffect, useRef, useState } from "react";
import axios from 'axios';
import Message from "./Message.jsx";
import MessageInput from "./MessageInput.jsx";

const ChatBox = ({ rootUrl }) => {
    const userData = document.getElementById('main')
        .getAttribute('data-user');

    const user = JSON.parse(userData);
    const webSocketChannel = `channel_for_everyone`;

    const [messages, setMessages] = useState([]);
    const lastMessageRef = useRef();

    const scrollToBottom = () => {
        lastMessageRef.current.scrollIntoView({ behavior: "smooth" });
    };

    const connectWebSocket = () => {
        window.Echo.private(webSocketChannel)
            .listen('GotMessage', async (e) => {
                await getMessages();
            });
    }

    const getMessages = async () => {
        try {
            const response = await axios.get(`${rootUrl}/messages`);
            setMessages(response.data);
        } catch (err) {
            console.log(err.message);
        }
    };

    useEffect(() => {
        getMessages();
        connectWebSocket();

        return () => {
            window.Echo.leave(webSocketChannel);
        }
    }, []);

    useEffect(() => {
        scrollToBottom();
    }, [messages]);

    return (
        <div className="row justify-content-center">
            <div className="col-md-8">
                <div className="card">
                    <div className="card-header">Chat Box</div>
                    <div className="card-body" style={{height: "500px", overflowY: "auto"}}>
                        {messages?.map((message, index) => (
                            <Message
                                key={message.id}
                                userId={user.id}
                                message={message}
                                ref={index === messages.length - 1 ? lastMessageRef : null}
                            />
                        ))}
                        <span ref={lastMessageRef}></span>
                    </div>
                    <div className="card-footer">
                        <MessageInput rootUrl={rootUrl} />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ChatBox;
