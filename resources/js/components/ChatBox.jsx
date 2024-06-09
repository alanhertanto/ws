import React, { useState, useEffect, useRef } from "react";
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
                // When a new message is received, update the messages state
                setMessages(prevMessages => [...prevMessages, e.message]);
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
        // Fetch initial messages when the component mounts
        getMessages();
        connectWebSocket();

        return () => {
            window.Echo.leave(webSocketChannel);
        }
    }, []);

    useEffect(() => {
        scrollToBottom();
    }, [messages]);

    const handleSendMessage = async (text) => {
        // Send the message to the server
        try {
            const response = await axios.post(`${rootUrl}/messages`, { text });
            // When the message is successfully sent, update the messages state
            setMessages(prevMessages => [...prevMessages, response.data]);
        } catch (err) {
            console.log(err.message);
        }
    };

    return (
        <div className="row justify-content-center">
            <div className="col-md-8">
                <div className="card">
                    <div className="card-header">Chat Box</div>
                    <div className="card-body" style={{height: "500px", overflowY: "auto"}}>
                        {messages.map((message, index) => (
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
                        <MessageInput rootUrl={rootUrl} onSendMessage={handleSendMessage} />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ChatBox;
