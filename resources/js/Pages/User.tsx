import React from "react";
import {usePage} from "@inertiajs/inertia-react";
import useRoute from "@/Hooks/useRoute";

const User = () => {
    const page = usePage<Object | any>();
    const route = useRoute();
    return (
        <>
            <table className="min-w-full w-full divide-y divide-gray-200">
                <thead className="bg-gray-50">
                <tr>
                    <th scope="col"
                        className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col"
                        className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th scope="col" className="relative px-6 py-3">
                        <span className="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody className="bg-white divide-y divide-gray-200">
                {page.props?.users?.map((user: Object | any, index: number) => (
                    <tr key={index}>
                        <td className="px-6 py-4 whitespace-nowrap">
                            <div className="flex items-center">
                                {user.id}
                            </div>
                        </td>
                        <td className="px-6 py-4 whitespace-nowrap">
                            <div className="flex items-center">
                                <div className="flex-shrink-0 h-10 w-10">
                                    <img
                                        className="h-10 w-10 border border-gray-100 rounded-full"
                                        src={user.profile_photo_url}
                                        alt=""/>
                                </div>
                                <div className="ml-4">
                                    <div className="text-md font-semibold text-gray-900">
                                        {user.name}
                                    </div>
                                    <div className="text-sm text-gray-500">
                                        {user.email}
                                    </div>
                                </div>
                            </div>
                        </td>
                        {/*<td className="px-6 py-4 whitespace-nowrap">*/}
                        {/*    @if($user->email_verified_at === null)*/}
                        {/*    <span*/}
                        {/*        className="bg-red-100 text-red-700 px-2.5 py-1 inline-flex text-sm leading-5 font-semibold rounded-lg">*/}
                        {/*                                            {{$user->email_verified_at === null ? 'unverified' : 'verified'}}*/}
                        {/*                                        </span>*/}
                        {/*    @else*/}
                        {/*    <span*/}
                        {/*        className="bg-green-100 text-green-700 px-2.5 py-1 inline-flex text-sm leading-5 font-semibold rounded-lg">*/}
                        {/*                                            {{$user->email_verified_at === null ? 'unverified' : 'verified'}}*/}
                        {/*                                        </span>*/}
                        {/*    @endif*/}
                        {/*</td>*/}
                        {/*<td className="px-6 py-4 whitespace-nowrap font-semibold text-sm text-gray-500">*/}
                        {/*    @foreach($user->getRoleNames() as $roleNames)*/}
                        {/*    <span*/}
                        {/*        className="bg-blue-100 text-blue-700 px-2.5 py-1 inline-flex text-sm leading-5 font-semibold rounded-lg">*/}
                        {/*                                            {{$roleNames}}*/}
                        {/*                                        </span>*/}
                        {/*    @endforeach*/}
                        {/*</td>*/}
                        <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href={route('lumki.users.edit', user)}
                               className="bg-gray-700 text-white p-2 px-4 rounded-lg hover:bg-gray-900">Edit</a>
                            {/*@if($user->hasRole('Superadmin') && Auth::user()->id === $user->id)*/}
                            {/*@else*/}
                            {/*<a href="{{ route('impersonate', $user->id) }}"*/}
                            {/*   className="bg-gray-700 text-white p-2 px-4 rounded-lg hover:bg-gray-900">{{*/}
                            {/*    __(*/}
                            {/*    'lumki::ui.impersonate')}}</a>*/}
                            {/*@endif*/}
                        </td>
                    </tr>))}

                </tbody>
            </table>
        </>
    )
}
export default User;
