import React from "react";
import {usePage} from "@inertiajs/inertia-react";

const User = () => {
    const page = usePage<Object | any>();
    return (
        <>
            <div>{page.props?.users?.data?.map((user: Object | any, index: number) => (
                <div key={index}>
                    <span>{user?.id}</span>
                    <span>{user?.name}</span>
                    <span>{user?.email}</span>
                </div>
            ))}</div>
        </>
    )
}
export default User;
