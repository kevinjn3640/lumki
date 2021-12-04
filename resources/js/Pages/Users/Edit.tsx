import React from "react";
import {useForm, usePage} from "@inertiajs/inertia-react";
//@ts-ignore
import useRoute from "@/Hooks/useRoute";
//@ts-ignore
import AppLayout from '../../../Layouts/AppLayout';
//@ts-ignore
import {Box, Flex, HStack, VStack} from "@chakra-ui/react";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetButton from "@/Jetstream/Button";
import classNames from "classnames";
import JetSectionTitle from "@/Jetstream/SectionTitle";
import JetActionSection from "@/Jetstream/ActionSection";
import JetConfirmsPassword from "@/Jetstream/ConfirmsPassword";

const Edit = () => {
    const page = usePage<Object | any>();
    const route = useRoute();

    const updateRolesForm = useForm({
        id: page.props.editingUser.id,
        roles: page.props.editingUserRoles.map((r: any) => r) as string[],
    });

    function updateRoles() {
        updateRolesForm.put(
            route('lumki.users.update', updateRolesForm.data.roles),
            {
                preserveScroll: true,
                preserveState: true,
            },
        );
    }

    return (
        <AppLayout
            title="Users"
            renderHeader={() => (
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Users
                </h2>
            )}
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <JetActionSection
                        title={'Update Roles'}
                        description={
                            'Roles let you manage user access to different parts of application.'
                        }
                    >
                        <VStack spacing={2} alignItems={'start'}>
                            <JetSectionTitle title={'Available Roles'} description={''}/>
                            <Flex justifyContent={'start'} alignItems={'center'} experimental_spaceX={6} width={'100%'}
                                  px={2} py={2}>
                                {page.props.availableRoles.map((roles: any, index: any) => (
                                    <Box alignItems={'center'}>
                                        <Box key={index} background={'gray.50'} border={1} borderStyle={'solid'}
                                             borderColor={'gray.100'} width={'auto'} display={'inline-flex'}
                                             rounded={'lg'}>
                                            <label className="flex justify-center items-center px-3 py-2 cursor-pointer">
                                                <JetCheckbox
                                                    value={roles.name}
                                                    checked={updateRolesForm.data.roles.includes(
                                                        roles.name
                                                    )}
                                                    onChange={e => {
                                                        if (
                                                            updateRolesForm.data.roles.includes(
                                                                e.currentTarget.value,
                                                            )
                                                        ) {
                                                            updateRolesForm.setData(
                                                                'roles',
                                                                updateRolesForm.data.roles.filter(
                                                                    p => p !== e.currentTarget.value,
                                                                ),
                                                            );
                                                        } else {
                                                            updateRolesForm.setData('roles', [
                                                                e.currentTarget.value,
                                                                ...updateRolesForm.data.roles,
                                                            ]);
                                                        }
                                                    }}
                                                />
                                                <span className="ml-2 text-sm text-gray-600">
                                        {roles.name}
                                    </span>
                                            </label>
                                        </Box>
                                    </Box>
                                ))}
                            </Flex>
                        </VStack>

                        <div className="mt-5">
                            <div>
                                <JetConfirmsPassword onConfirm={updateRoles}>
                                    <JetButton
                                        type="button"
                                        className={classNames({'opacity-25': updateRolesForm.processing})}
                                        disabled={updateRolesForm.processing}
                                    >
                                        Update Roles
                                    </JetButton>
                                </JetConfirmsPassword>
                            </div>
                        </div>
                    </JetActionSection>
                </div>
            </div>
        </AppLayout>
    )
}
export default Edit;
