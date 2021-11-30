import React from "react";
import {usePage} from "@inertiajs/inertia-react";
const User = () => {
    const page = usePage<Object | any>();
    return (
        <>
            <div>{page.props?.users?.data?.map((user: Object | any, index: number) => (
                <div key={index}>{user?.id}{" "}{user?.name}{" "}{user?.email}</div>
            ))}</div>
        </>
    )
}
export default User;
