import React from 'react';

interface ThrobberSize {
    size: string
}

export const Throbber = ({size}: ThrobberSize): JSX.Element => {
    return (
        <>
            <span className={`loading loading-ring loading-${size} text-info`} />
        </>
    )
}